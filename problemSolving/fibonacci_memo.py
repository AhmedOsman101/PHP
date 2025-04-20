def fibonacci(n: int, memo={}) -> int:
    if n == 0: return 0
    if n <= 2: return 1
    if n in memo.keys(): return memo[n] # memoization 😏👌
    memo[n] = fibonacci(n-1, memo) + fibonacci(n-2, memo)
    return memo[n]


print(fibonacci(0))
print(fibonacci(1))
print(fibonacci(2))
print(fibonacci(3))
print(fibonacci(4))
print(fibonacci(10))
print(fibonacci(40))
print(fibonacci(400))
