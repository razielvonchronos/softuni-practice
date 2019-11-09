(function solve() {
  // returns the last element of the array
  Array.prototype.last = function () {
    return this[this.length - 1]
  }
  // returns a new array which includes all original elements, except the first n elements; n is a Number parameter
  Array.prototype.skip = function (n) {
    return this.slice(n);
  }
  // returns a new array containing the first n elements from the original array; n is a Number parameter
  Array.prototype.take = function (n) {
    return this.slice(0, n);
  }
  // returns a sum of all array elements
  Array.prototype.sum = function () {
    return this.reduce((acc, curr) => acc + curr, 0);
  }
  // returns the average of all array elements
  Array.prototype.average = function () {
    return this.sum() / this.length;
  }
}());