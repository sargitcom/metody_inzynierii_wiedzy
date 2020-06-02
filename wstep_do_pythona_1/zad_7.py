someList = [1,2,3,4,5,6,7,8,9,10]
anotherList = someList[5:10:1]
del someList[5:10:1]

joinedList = someList + anotherList

joinedList = [0] + joinedList

joinedListCopy = joinedList.copy()
joinedListCopy = joinedListCopy[::-1]

print(joinedList)
print(joinedListCopy)