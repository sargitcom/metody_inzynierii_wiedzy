print('{:+d}'.format(42))
print('{:=+5d}'.format(23))

data = {'first': 'Test', 'last': 'Test'}

print('{first} {last}'.format(**data))

print('{:{prec}} = {:{prec}}'.format('Some long text', 3.1415, prec='.3'))

print('{:{}{}{}.{}}'.format(2.7182818284, '>', '+', 10, 3))