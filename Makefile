MAJOR_VERSION = 2
MINOR_VERSION = 13
BUILD_TIMESTAMP = $(shell basename `date "+%y%m%d%H%M"`)
LAST_COMMIT_HASH = $(shell git log -1 --pretty=format:"%h")

PATH_TO_CORE = src/csscomb.php
PATH_TO_PLUGINS = src/plugins
PATH_TO_CODA_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.codaplugin
PATH_TO_CODA_2_PLUGIN = $(PATH_TO_PLUGINS)/csscomb_for_coda_2.codaplugin
PATH_TO_CODA_PLUGIN_CORE = $(PATH_TO_CODA_PLUGIN)/Contents/Resources/55543892-82DE-4679-9ADE-11CA109E2C68
PATH_TO_CODA_2_PLUGIN_CORE = $(PATH_TO_CODA_2_PLUGIN)/Contents/Resources/55543892-82DE-4679-9ADE-11CA109E2C68
PATH_TO_TEXTMATE_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.tmbundle
PATH_TO_NOTEPAD_P_P_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.notepad_plus_plus
PATH_TO_INTELLIJ_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.webstorm_pycharm_idea
PATH_TO_ESPRESSO_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.sugar

buildAll: buildCli copyCore buildPlugins buildWww
	@echo 'Successfully done.'

all: updateVersion buildCli copyCore buildPlugins buildWww
	@echo 'Successfully done.'

updateVersion:
	@echo 'Updating version...'
	@sed -i '' 's/[0-9].[0-9]\{2\} (build [a-z0-9]\{7\}-[0-9]\{10\})/$(MAJOR_VERSION).$(MINOR_VERSION) \(build $(LAST_COMMIT_HASH)-$(BUILD_TIMESTAMP)\)/' $(PATH_TO_CORE) src/cli.php $(PATH_TO_CODA_2_PLUGIN_CORE)/csscomb.php $(PATH_TO_CODA_PLUGIN_CORE)/csscomb.php $(PATH_TO_TEXTMATE_PLUGIN)/Commands/CSScomb.tmCommand $(PATH_TO_ESPRESSO_PLUGIN)/Scripts/inline-csscomb.php

buildCli:
	@echo 'Building CLI...'
	@mkdir -p build/cli
	@cp $(PATH_TO_CORE) build/cli/csscomb.php
	@sed '1d' < src/cli.php >> build/cli/csscomb.php
	@zip -9 -y -r -q build/csscomb-cli_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) build/cli/csscomb.php

copyCore:
	@echo 'Copying CLI...'
	@mkdir -p www/src
	@echo 'Copying core to web app...'
	@cp $(PATH_TO_CORE) www/$(PATH_TO_CORE)
	@echo 'Copying core to plugins...'
	@mkdir -p $(PATH_TO_CODA_PLUGIN_CORE)/Support\ Files
	@mkdir -p $(PATH_TO_CODA_2_PLUGIN_CORE)/Support\ Files
	@mkdir -p $(PATH_TO_TEXTMATE_PLUGIN)/Support/lib
	@mkdir -p $(PATH_TO_ESPRESSO_PLUGIN)/ScriptLibraries
	@cp $(PATH_TO_CORE) $(PATH_TO_CODA_PLUGIN_CORE)/Support\ Files/csscomb.php
	@cp $(PATH_TO_CORE) $(PATH_TO_CODA_2_PLUGIN_CORE)/Support\ Files/csscomb.php
	@cp $(PATH_TO_CORE) $(PATH_TO_TEXTMATE_PLUGIN)/Support/lib/csscomb.php
	@cp $(PATH_TO_CORE) $(PATH_TO_ESPRESSO_PLUGIN)/ScriptLibraries/csscomb.php

buildPlugins: buildNotepadPlugin buildIntellijPlugin
	@echo 'Making plugin archives...'
	@mkdir -p build
	@zip -9 -y -r -q build/csscomb_for_coda_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_CODA_PLUGIN)
	@zip -9 -y -r -q build/csscomb_for_coda-2_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_CODA_2_PLUGIN)
	@zip -9 -y -r -q build/csscomb_for_textmate_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_TEXTMATE_PLUGIN)
	@zip -9 -y -r -q build/csscomb_for_notepad-plus-plus_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_NOTEPAD_P_P_PLUGIN)
	@# Fix Issue #161: Remove call.php from IntelliJ plugin zip
	@mv $(PATH_TO_INTELLIJ_PLUGIN)/call.php $(PATH_TO_PLUGINS)/call.php
	@zip -9 -y -r -q build/csscomb_for_webstorm-pycharm-idea_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_INTELLIJ_PLUGIN)
	@mv $(PATH_TO_PLUGINS)/call.php $(PATH_TO_INTELLIJ_PLUGIN)/call.php
	@zip -9 -y -r -q build/csscomb_for_espresso-2_$(MAJOR_VERSION)-$(MINOR_VERSION)-$(BUILD_TIMESTAMP) $(PATH_TO_ESPRESSO_PLUGIN)

buildNotepadPlugin:
	@echo 'Building plugin for Notepad++...'
	@cp $(PATH_TO_CORE) $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php
	@sed '1d' < $(PATH_TO_NOTEPAD_P_P_PLUGIN)/call.php >> $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php

buildIntellijPlugin:
	@echo 'Building plugins for IntelliJ IDEA / PyStorm / WebStorm...'
	@cp $(PATH_TO_CORE) $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php
	@sed '1d' < $(PATH_TO_INTELLIJ_PLUGIN)/call.php >> $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php

buildWww: useCsscomb
	# YUI Compressor required
	# http://yuilibrary.com/download/yuicompressor/
	@echo 'Minifying CSS & JS...'
	@mkdir -p www/static/_css
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
	@php build/cli/csscomb.php -i www/static/css

clean:
	@echo 'Removing all from build/...'
	@rm -fr build/*
