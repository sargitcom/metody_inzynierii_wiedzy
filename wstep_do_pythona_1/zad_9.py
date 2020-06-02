krotka = (
    ("112233", "Jan Kowalski"),
    ("445566", "Roman Nikołajczuk"),
    ("778899", "Andrzej Gierz"),
)

slownik = dict(krotka);

slownik["112233"] = {"imie_i_nazwisko": slownik["112233"], 'email': 'somemail@test.pl', 'age': '18', 'yearOfBirth': '1987', 'address': 'Warsaw Africans 12A/11'}
slownik["445566"] = {"imie_i_nazwisko": slownik["445566"], 'email': 'somemail@test.pl', 'age': '18', 'yearOfBirth': '1987', 'address': 'Warsaw Africans 12A/11'}
slownik["778899"] = {"imie_i_nazwisko": slownik["778899"], 'email': 'somemail@test.pl', 'age': '18', 'yearOfBirth': '1987', 'address': 'Warsaw Africans 12A/11'}

print(slownik)
