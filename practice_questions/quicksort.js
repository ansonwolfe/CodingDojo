function quicksort (array){
  if (array.length <= 1) {
    return array
  }
  var randomNumber = Math.floor(Math.random()* array.length)

  var pivotNumber = array.splice(randomNumber, 1)
  var left = []
  var right = []
  for (var x in array) {
    if (array[x] <= pivotNumber) {
      left.push(array[x])
    }
    else {
      right.push(array[x])
    }
  }
  var leftSorted = quicksort(left)
  var rightSorted = quicksort(right)
  return leftSorted.concat(pivotNumber).concat(rightSorted)
}

console.log(quicksort([2,3,1,6,3,5,0,9]))
