def convertToTemp(degrees, temperature_type):
    if (temperature_type not in ["Fahrenheit", "Rankine", "Kelvin"]):
        return "error"

    if temperature_type == "Fahrenheit":
        return degrees * (9/5) + 32;

    if temperature_type == "Rankine":
        return round(degrees *  (9/5) + 491.67, 2);

    if temperature_type == "Kelvin":
        return degrees + 273.15;

print(convertToTemp(100, "Fahrenheit"))
print(convertToTemp(100, "Rankine"))
print(convertToTemp(100, "Kelvin"))
print(convertToTemp(100, "blad"))