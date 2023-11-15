def reverse_words_order_and_swap_cases(s):
    words = s.split(" ")
    for i in range(len(words)):
        words[i] = ''.join([char.lower() if char.isupper() else char.upper() for char in words[i]])
    return " ".join(words[::-1])

# print(reverse_words_order_and_swap_cases("rUns dOg"))

def transform_sentence(s):
    words = s.split(" ")
    for i in range(len(words)):
        for j in range(1, len(words[i])):
            if words[i][j - 1].lower() < words[i][j].lower():
                words[i] = words[i][:j] + words[i][j].upper() + words[i][j + 1:]
            elif words[i][j - 1].lower() > words[i][j].lower():
                words[i] = words[i][:j] + words[i][j].lower() + words[i][j + 1:]
    return " ".join(words)
print(transform_sentence("coOL dog")) # output: "cOOl dOg"

