
function solve() {
  class Melon {
    constructor(weight, melonSort) {
      if (new.target === Melon) {
        throw new TypeError("Abstract class cannot be instantiated directly");
      }
      this.weight = weight;
      this.melonSort = melonSort;
      this._element = null;
      this._elementIndex = 0;
    }

    get elementIndex() {
      return this.weight * this.melonSort.length;
    }

    get element() {
      return this._element;
    }

    set element(element) {
      this._element = element;
    }

    toString() {
      let str = `Element: ${this.element}\n`;
      str += `Sort: ${this.melonSort}\n`;
      str += `Element Index: ${this.elementIndex}`;
      return str;
    }
  }

  class Watermelon extends Melon {
    constructor(weight, melonSort) {
      super(weight, melonSort)
      this.element = "Water";
    }
  }
  class Firemelon extends Melon {
    constructor(weight, melonSort) {
      super(weight, melonSort)
      this.element = "Fire";
    }
  }
  class Earthmelon extends Melon {
    constructor(weight, melonSort) {
      super(weight, melonSort)
      this.element = "Fire";
    }
  }
  class Airmelon extends Melon {
    constructor(weight, melonSort) {
      super(weight, melonSort)
      this.element = "Fire";
    }
  }

  class Melolemonmelon extends Watermelon {
    constructor(weight, melonSort) {
      super(weight, melonSort)
      this.melons = ['Water', 'Fire', 'Earth', 'Earth'];
      this.prototype = Object.getPrototypeOf(Watermelon)
      this.morph();
    }
    morph() {
      let melon = this.melons.shift();
      this.melons.push(melon);
      this.element = melon;
      return this;
    }
  }

  return {
    Melon, Watermelon, Firemelon, Earthmelon, Airmelon, Melolemonmelon
  }
}

let classes = solve();
// let test = new classes.Melon(100, "Test");
//Throws error

let melon = new classes.Melolemonmelon(12.5, "Kingsize");

console.log(Object.getPrototypeOf(Object.getPrototypeOf(classes.Melon)));
console.log(Object.getPrototypeOf(Object.getPrototypeOf(classes.Melolemonmelon)));
