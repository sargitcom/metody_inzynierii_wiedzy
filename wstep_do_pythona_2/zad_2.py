def metaData(val):
    return {
        'length' : len(val),
        'onlyLetters': set(list(val)),
        'letters' : list(val),
        'big_letters': val.upper(),
        'small_letters': val.lower()
    }

print(metaData("To jest jakis tekst"))