def best_friends(t,a,b):
    return t.count(a) == t.count(a+b)
print(best_friends("he headed toh the tea store", "h", "e"))
print(best_friends('I found an ounce with my hound', 'o', 'u'))
