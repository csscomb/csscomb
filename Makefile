MAJOR_VERSION = 2
MINOR_VERSION = 10
BUILD_TIMESTAMP = $(shell basename `date "+%y%m%d%H%M"`)
LAST_COMMIT_HASH = $(shell git log -1 --pretty=format:"%h")

PATH_TO_CORE = lib/csscomb.php
PATH_TO_PLUGINS = plugins
PATH_TO_CODA_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.codaplugin
PATH_TO_CODA_PLUGIN_CORE = $(PATH_TO_CODA_PLUGIN)/Contents/Resources/55543892-82DE-4679-9ADE-11CA109E2C68
PATH_TO_TEXTMATE_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.tmbundle
PATH_TO_NOTEPAD_P_P_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.notepad_plus_plus
PATH_TO_INTELLIJ_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.webstorm_pycharm_idea

buildAll: updateVersion buildCli copyCore buildPlugins buildWww
	@echo 'Successfully done.'

updateVersion:
	@echo 'Updating version...'
	@sed -i '' 's/[0-9].[0-9]\{2\} (build [a-z0-9]\{7\}-[0-9]\{10\})/$(MAJOR_VERSION).$(MINOR_VERSION) \(build $(LAST_COMMIT_HASH)-$(BUILD_TIMESTAMP)\)/' $(PATH_TO_CORE) cli/cli.php $(PATH_TO_CODA_PLUGIN_CORE)/csscomb.php $(PATH_TO_TEXTMATE_PLUGIN)/Commands/CSScomb.tmCommand

buildCli:
	@echo 'Building CLI...'
	@cp $(PATH_TO_CORE) cli/csscomb.php
	@sed '1d' < cli/cli.php >> cli/csscomb.php

copyCore:
	@echo 'Copying CLI...'
	@cp $(PATH_TO_CORE) www/$(PATH_TO_CORE)
	@cp $(PATH_TO_CORE) $(PATH_TO_CODA_PLUGIN_CORE)/Support\ Files/csscomb.php
	@cp $(PATH_TO_CORE) $(PATH_TO_TEXTMATE_PLUGIN)/Support/lib/csscomb.php

buildPlugins: buildNotepadPlugin buildIntellijPlugin
	@echo 'Making plugin archives...'
	@mkdir -p build
	@zip -9 -y -r -q build/csscomb-for-coda-$(MAJOR_VERSION)-$(MINOR_VERSION) $(PATH_TO_CODA_PLUGIN)
	@zip -9 -y -r -q build/csscomb-for-textmate-$(MAJOR_VERSION)-$(MINOR_VERSION) $(PATH_TO_TEXTMATE_PLUGIN)
	@zip -9 -y -r -q build/csscomb-for-notepad_plus_plus-$(MAJOR_VERSION)-$(MINOR_VERSION) $(PATH_TO_NOTEPAD_P_P_PLUGIN)
	@zip -9 -y -r -q build/csscomb-for-webstorm_pycharm_idea-$(MAJOR_VERSION)-$(MINOR_VERSION) $(PATH_TO_INTELLIJ_PLUGIN)

buildNotepadPlugin:
	@echo 'Building plugin for Notepad++...'
	@cp $(PATH_TO_CORE) $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php
	@sed '1d' < $(PATH_TO_NOTEPAD_P_P_PLUGIN)/call.php >> $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php

buildIntellijPlugin:
	@echo 'Building plugins for IntelliJ IDEA / PyStorm / WebStorm...'
	@cp $(PATH_TO_CORE) $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php
	@sed '1d' < $(PATH_TO_INTELLIJ_PLUGIN)/call.php >> $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php

buildWww: useCsscomb
	@echo 'Minifying CSS & JS...'
	@java -jar yuicompressor-2.4.7.jar www/static/css/style.css > www/static/_css/style.css
	@java -jar yuicompressor-2.4.7.jar www/static/css/tests.css > www/static/_css/tests.css
	@java -jar yuicompressor-2.4.7.jar www/static/js/online.js > www/static/_js/online.js
	@java -jar yuicompressor-2.4.7.jar www/static/js/tests.js > www/static/_js/tests.js
	@java -jar yuicompressor-2.4.7.jar www/static/js/jquery.textarea.js > www/static/_js/jquery.textarea.js
	@java -jar yuicompressor-2.4.7.jar www/static/js/jquery.freeze.js > www/static/_js/jquery.freeze.js
	
	@echo 'Concatenating CSS & JS to bundle...'
	@cat www/static/_css/style.css www/static/_css/tests.css > www/static/_css/csscomb.css
	@cat www/static/_js/jquery.shortcuts.min.js www/static/_js/jquery.textarea.js > www/static/_js/csscomb.js

useCsscomb:
	@echo 'Using CSScomb for CSScomb web site...'
	@php cli/csscomb.php -i www/static/css
