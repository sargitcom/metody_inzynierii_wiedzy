class Calculator:
    #def __init__(self):

    def add(self, x, y):
        return x + y

    def difference(self, x, y):
        return x - y

    def multiply(self, x, y):
        return x * y

    def divide(self, x, y):
        return x / y

calc = Calculator()

print(calc.add(5,3))
print(calc.difference(5,3))
print(calc.multiply(5,3))
print(calc.divide(5,3))