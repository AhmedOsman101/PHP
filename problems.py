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
# print(transform_sentence("coOL dog")) # output: "cOOl dOg"

def best_friend(txt, a, b):
    text = txt.split(" ")
    for j in text:
        if len(j)<=1 and a in j or a in j and b not in j:
            return False
        else:
            for i in range(len(j)-1):
                if j[i] == a:
                    if j[i+1] == b:
                        pass
                    else:
                        return False
                elif j[-1] == a:
                    return False
    return True

def best_friends(t,a,b):
    return t.count(a)==t.count(a+b)


print(best_friends("he headed to the tea store", "h", "e"))
print(best_friends('i found an ounce with my hound', 'o', 'u'))