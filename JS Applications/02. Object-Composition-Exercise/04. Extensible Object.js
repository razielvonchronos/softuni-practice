let myObj = {
  extend(template) {
    Object.getOwnPropertyNames(template).map(x => {
      if (typeof template[x] === 'function') {
        Object.prototype = { x: template[x] }
      } else {
        Object.x = template[x];
      }
    })
  }
}

let template = {
  extensionMethod: function () { console.log('2') },
  extensionProperty: 'someString'
}
let obj = myObj;
obj.extend(template);
obj.extensionMethod()