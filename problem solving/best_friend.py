def best_friend(txt, a, b):
    text = txt.split(" ")
    for j in text:
        if len(j)<=1 and a in j or a in j and b not in j: return False
        else:
            for i in range(len(j)-1):
                if j[i] == a:
                    if j[i+1] == b: pass
                    else: return False
                elif j[-1] == a: return False
    return True