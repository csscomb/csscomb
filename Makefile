MAJOR_VERSION = 2
MINOR_VERSION = 10
BUILD_TIMESTAMP = $(shell basename `date "+%y%m%d%H%M"`)

PATH_TO_CORE = lib/csscomb.php
PATH_TO_PLUGINS = plugins
PATH_TO_CODA_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.codaplugin/Contents/Resources/55543892-82DE-4679-9ADE-11CA109E2C68
PATH_TO_TEXTMATE_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.tmbundle
PATH_TO_NOTEPAD_P_P_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.notepad_plus_plus
PATH_TO_INTELLIJ_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.webstorm_pycharm_idea

buildAll: updateVersion buildCli copyCore buildPlugins buildWww

updateVersion:
	#
	# Update version:
	sed -i '' 's/[0-9].[0-9]\{2\} (build [0-9]\{10\})/$(MAJOR_VERSION).$(MINOR_VERSION) \(build $(BUILD_TIMESTAMP)\)/' $(PATH_TO_CORE) cli/cli.php $(PATH_TO_CODA_PLUGIN)/csscomb.php $(PATH_TO_TEXTMATE_PLUGIN)/Commands/CSScomb.tmCommand

buildCli:
	#
	# Build CLI:
	cp $(PATH_TO_CORE) cli/csscomb.php
	sed '1d' < cli/cli.php >> cli/csscomb.php

copyCore:
	#
	cp $(PATH_TO_CORE) www/$(PATH_TO_CORE)
	cp $(PATH_TO_CORE) $(PATH_TO_CODA_PLUGIN)/Support\ Files/csscomb.php
	cp $(PATH_TO_CORE) $(PATH_TO_TEXTMATE_PLUGIN)/Support/lib/csscomb.php

buildPlugins: buildNotepadPlugin buildIntellijPlugin
	mkdir -p build
	tar -c -z $(PATH_TO_CODA_PLUGIN) > build/csscomb-for-coda-$(MAJOR_VERSION)-$(MINOR_VERSION).tar
	tar -c -z $(PATH_TO_TEXTMATE_PLUGIN) > build/csscomb-for-textmate-$(MAJOR_VERSION)-$(MINOR_VERSION).tar
	tar -c -z $(PATH_TO_NOTEPAD_P_P_PLUGIN) > build/csscomb-for-notepad_plus_plus-$(MAJOR_VERSION)-$(MINOR_VERSION).tar
	tar -c -z $(PATH_TO_INTELLIJ_PLUGIN) > build/csscomb-for-webstorm_pycharm_idea-$(MAJOR_VERSION)-$(MINOR_VERSION).tar

buildNotepadPlugin:
	#
	# Notepad++:
	cp $(PATH_TO_CORE) $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php
	sed '1d' < $(PATH_TO_NOTEPAD_P_P_PLUGIN)/call.php >> $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php

buildIntellijPlugin:
	#
	# IntelliJ IDEA / PyStorm / WebStorm:
	cat $(PATH_TO_INTELLIJ_PLUGIN)/call.php | sed '1d' > $(PATH_TO_INTELLIJ_PLUGIN)/temp
	cat $(PATH_TO_CORE) $(PATH_TO_INTELLIJ_PLUGIN)/temp > $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php
	rm $(PATH_TO_INTELLIJ_PLUGIN)/temp

buildWww:
	java -jar yuicompressor-2.4.7.jar www/static/css/style.css > www/static/_css/style.css
	java -jar yuicompressor-2.4.7.jar www/static/css/tests.css > www/static/_css/tests.css
	java -jar yuicompressor-2.4.7.jar www/static/js/online.js > www/static/_js/online.js
	java -jar yuicompressor-2.4.7.jar www/static/js/tests.js > www/static/_js/tests.js
	java -jar yuicompressor-2.4.7.jar www/static/js/jquery.textarea.js > www/static/_js/jquery.textarea.js
	java -jar yuicompressor-2.4.7.jar www/static/js/jquery.freeze.js > www/static/_js/jquery.freeze.js
	
	cat www/static/_css/style.css www/static/_css/tests.css > www/static/_css/csscomb.css
	cat www/static/_js/jquery.shortcuts.min.js www/static/_js/jquery.textarea.js > www/static/_js/csscomb.js
