MAJOR_VERSION = 3
BUILD_TIMESTAMP = $(shell basename `date "+%y%m%d%H%M"`)

PATH_TO_CORE = lib/csscomb.php
PATH_TO_PLUGINS = plugins
PATH_TO_CODA_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.codaplugin/Contents/Resources/55543892-82DE-4679-9ADE-11CA109E2C68
PATH_TO_TEXTMATE_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.tmbundle
PATH_TO_NOTEPAD_P_P_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.notepad_plus_plus
PATH_TO_INTELLIJ_PLUGIN = $(PATH_TO_PLUGINS)/csscomb.webstorm_pycharm_idea

buildAll: updateVersion buildCli copyCore buildPlugins

updateVersion:
	#
	# Update version:
	sed -i '' 's/[0-9].[0-9]\{10\}/$(MAJOR_VERSION).$(BUILD_TIMESTAMP)/' $(PATH_TO_CORE) cli/cli.php $(PATH_TO_CODA_PLUGIN)/csscomb.php $(PATH_TO_TEXTMATE_PLUGIN)/Commands/CSScomb.tmCommand

buildCli:
	#
	# Build CLI:
	cat cli/cli.php | sed '1d' > cli/temp
	cat $(PATH_TO_CORE) cli/temp > cli/csscomb.php
	rm cli/temp

copyCore:
	#
	cp $(PATH_TO_CORE) www/$(PATH_TO_CORE)
	cp $(PATH_TO_CORE) $(PATH_TO_CODA_PLUGIN)/Support\ Files/csscomb.php
	cp $(PATH_TO_CORE) $(PATH_TO_TEXTMATE_PLUGIN)/Support/lib/csscomb.php

buildPlugins: buildNotepadPlugin buildIntellijPlugin

buildNotepadPlugin:
	#
	# Notepad++:
	cat $(PATH_TO_NOTEPAD_P_P_PLUGIN)/call.php | sed '1d' > $(PATH_TO_NOTEPAD_P_P_PLUGIN)/temp
	cat $(PATH_TO_CORE) $(PATH_TO_NOTEPAD_P_P_PLUGIN)/temp > $(PATH_TO_NOTEPAD_P_P_PLUGIN)/csscomb.php
	rm $(PATH_TO_NOTEPAD_P_P_PLUGIN)/temp

buildIntellijPlugin:
	#
	# IntelliJ IDEA / PyStorm / WebStorm:
	cat $(PATH_TO_INTELLIJ_PLUGIN)/call.php | sed '1d' > $(PATH_TO_INTELLIJ_PLUGIN)/temp
	cat $(PATH_TO_CORE) $(PATH_TO_INTELLIJ_PLUGIN)/temp > $(PATH_TO_INTELLIJ_PLUGIN)/csscomb.php
	rm $(PATH_TO_INTELLIJ_PLUGIN)/temp
