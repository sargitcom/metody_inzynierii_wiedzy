def takeList(list1, list2):
    return list1[::2] + list2[1::2]

print(takeList([1,2,3,4,5,6], [7,8,9,10,11,12]))