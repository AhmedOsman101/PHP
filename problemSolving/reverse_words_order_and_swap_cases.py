def reverse_words_order_and_swap_cases(s):
    words = s.split(" ")
    for i in range(len(words)):
        words[i] = ''.join([char.lower() if char.isupper() else char.upper() for char in words[i]])
    return " ".join(words[::-1])

print(reverse_words_order_and_swap_cases("rUns dOg"))