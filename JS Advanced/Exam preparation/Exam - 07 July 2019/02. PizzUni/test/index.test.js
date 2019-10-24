const expect = require('chai').expect;
const assert = require('chai').assert;
const should = require('chai').should;
const beforeEach = require('mocha').beforeEach;
const PizzUni = require('../index.js');

describe("Tests ...", function () {
  let PizzaShop;
  let products;
  let orders;
  let validUser;
  let ProductsDefaults;

  beforeEach(() => {
    PizzaShop = new PizzUni();
    users = PizzaShop.registeredUsers;
    products = PizzaShop.availableProducts;
    orders = PizzaShop.orders;
    validUser = 'raziel@abv.bg';
    ProductsDefaults = {
      "drinks": [
        "Coca-Cola",
        "Fanta",
        "Water",
      ],
      "pizzas": [
        "Italian Style",
        "Barbeque Classic",
        "Classic Margherita",
      ]
    }
  });

  describe('contructor tests', () => {
    it('should initialize with properties correctly', () => {
      let expectedKeys = { registeredUsers: [], availableProducts: ProductsDefaults, orders: [] };
      assert.deepOwnInclude(PizzaShop, expectedKeys);
    })
  })

  describe("registerUser() tests", function () {
    it('Receives a string (email)', () => assert.isString(PizzaShop.registerUser(validUser).email))
    it('the email is already used', () => {
      let user = PizzaShop.registerUser(validUser);
      let action = () => PizzaShop.registerUser(user.email);
      assert.throw(action, Error, `This email address (${user.email}) is already being used!`);
    })

    it("upon registration, registeredUsers hold user's email and orderHistory", () => {
      let user = PizzaShop.registerUser(validUser);
      assert.deepEqual(PizzaShop.doesTheUserExist(user.email), { email: user.email, orderHistory: [] })
    })

    it('returns object with given email and orderHistory which is an empty array.', () => {
      let user = PizzaShop.registerUser(validUser);
      assert.deepEqual(user, { email: user.email, orderHistory: [] })
    })
  })

  describe("makeAnOrder() tests", function () {
    it('Should throw error on wrong email', () => {
      let action = () => PizzaShop.makeAnOrder('pesho@abv.bg', products.pizzas[0], products.drinks[0]);
      assert.throw(action, Error, 'You must be registered to make orders!');
    })

    it('Should throw error on wrong pizza', () => {
      let user = PizzaShop.registerUser(validUser);
      let action = () => PizzaShop.makeAnOrder(user.email, undefined, products.drinks[0]);
      assert.throw(action, Error, "You must order at least 1 Pizza to finish the order.")
    })

    it('Should fail on ordering a wrong drink', () => {
      let user = PizzaShop.registerUser(validUser);
      let id = PizzaShop.makeAnOrder(user.email, products.pizzas[0], 3);
      assert.isUndefined(user.orderHistory[id].orderedDrink);
    })

    it("Check order's format", () => {
      let user = PizzaShop.registerUser(validUser);
      let oid = PizzaShop.makeAnOrder(user.email, products.pizzas[0], products.drinks[0]);
      let expectedOrder = { orderedPizza: products.pizzas[0], orderedDrink: products.drinks[0] };
      assert.deepEqual(user.orderHistory[oid], expectedOrder);
    })

    it('Should return the a number', () => {
      let user = PizzaShop.registerUser(validUser);
      let actual = PizzaShop.makeAnOrder(user.email, products.pizzas[0], products.drinks[0]);
      expect(isNaN(actual)).to.be.equal(false);
    })
  })

  describe("completeOrder() tests", function () {
    it('Should complete first order', () => {
      let user = PizzaShop.registerUser(validUser);
      PizzaShop.makeAnOrder(user.email, products.pizzas[0], products.drinks[0]);
      assert.equal(PizzaShop.completeOrder().status, 'completed');
    })
  })

  describe("detailsAboutMyOrder({id}) tests", function () {
    it("Order id is invalid", () => {
      assert.isUndefined(PizzaShop.detailsAboutMyOrder(10))
    })
    it('function returns the status of that order', () => {
      let users = PizzaShop.registerUser(validUser);
      let id = PizzaShop.makeAnOrder(users.email, products.pizzas[0], products.drinks[0]);
      let orderDetails = PizzaShop.detailsAboutMyOrder(id);
      assert(orderDetails == `Status of your order: ${PizzaShop.orders[id].status}`);
    })
  })

  describe("doesTheUserExist({email}) tests", function () {
    it("Order doesn't exist", () => {
      let user = PizzaShop.registerUser(validUser);
      assert.deepEqual(PizzaShop.doesTheUserExist(validUser), user)
    })
  })
})