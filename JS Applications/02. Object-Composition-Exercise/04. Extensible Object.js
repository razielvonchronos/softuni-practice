
function result() {
  let myObj = {
    extend(template) {
      Object.getOwnPropertyNames(template).map(x => {
        if (typeof template[x] === 'function') {
          Object.prototype[x] = template[x]
        } else {
          this[x] = template[x];
        }
      })
    }
  }
  return myObj
}

let template = {
  extensionMethod: function () { console.log('42') },
  extensionProperty: 'someString'
}

let obj = myObj;
obj.extend(template);
obj.extensionMethod()
console.log(obj.extensionProperty)
console.log(obj)