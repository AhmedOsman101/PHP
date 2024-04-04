def maskify(str):
    str = list(str)
    for i in range(0, len(str)-4):
        str[i] = "#"
    return "".join(str)

print(maskify("stores")) # outputs: ##ores
