from file_manager.file_manager import *


fm = FileManager()

fm.update_file("TEST")
fm.update_file("TEST 2")
fm.update_file("TEST 3")

print(fm.read_file())
