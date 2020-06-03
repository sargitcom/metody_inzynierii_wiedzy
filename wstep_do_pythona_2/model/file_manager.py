class FileManager:
    def read_file(self):
        file = open("some_file.txt", "r")
        return file.read()

    def update_file(self, text_data):
        file = open("some_file.txt", "a")
        file.writelines(text_data)
        return
