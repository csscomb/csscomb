import sublime
import sublime_plugin
import threading
import sys,subprocess,os
from os import path

__file__ = path.normpath(path.abspath(__file__))
__path__ = path.dirname(__file__)
libs_path = path.join(__path__, 'libs')
csscomb_path = path.join(libs_path, 'call_string.php')

class BaseSort(threading.Thread):

    def __init__(self, sel, original):
        self.sel = sel
        self.original = original
        self.result = None
        self.error = None
        threading.Thread.__init__(self)

    def exec_request(self):
        startupinfo = None
        if os.name == 'nt':
            startupinfo = subprocess.STARTUPINFO()
            startupinfo.dwFlags |= subprocess.STARTF_USESHOWWINDOW
            startupinfo.wShowWindow = subprocess.SW_HIDE
        
        myprocess = subprocess.Popen(['php', csscomb_path, self.original], shell=False, stdout=subprocess.PIPE, startupinfo=startupinfo)
        (sout,serr) = myprocess.communicate()
        myprocess.wait()

        if len(sout) > 0:
            return sout
        else:
            return None

    def run(self):
        try:
            self.result = self.exec_request()
        except (OSError) as (e):
             self.error = True
             self.result = 'Sorter Error: attempt to sort non-existent file'
