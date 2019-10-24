const expect = require('chai').expect;
const assert = require('chai').assert;
const should = require('chai').should;
const beforeEach = require('mocha').beforeEach;
const PizzUni = require('../index.js');




describe("Tests ...", function () {
  /** class PizzUni */
  let PizzaShop;
  let users;
  let products;
  let orders;
  let validUser;

  beforeEach(() => {
    PizzaShop = new PizzUni();
    users = PizzaShop.registeredUsers;
    products = PizzaShop.availableProducts;
    orders = PizzaShop.orders;
  });

  describe('contructor tests', () => {
    let ProductsDefaults = {
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

    it('should initialize with properties correctly', () => {
      expect(users).to.deep.equal([]);
      expect(products).to.deep.equal(ProductsDefaults);
      expect(orders).to.deep.equal([]);
    })
  })

  describe("registerUser() tests", function () {

    // it('should accept only strings', () => {
    //   let input = {};
    //   let result = PizzaShop.registerUser(input);
    //   expect(typeof result.email).to.be.equal('string')
    // })

    it('should throw error on dublicate', function () {
      validUser = 'raziel@abv.bg';
      PizzaShop.registerUser(validUser);
      let actual = () => PizzaShop.registerUser(validUser);
      expect(actual).to.throw(Error, `This email address (${validUser}) is already being used!`);
    })

    it('should return object of user', function () {
      let expected = {
        email: validUser,
        orderHistory: []
      }
      let actual = PizzaShop.registerUser(validUser);
      expect(actual).to.deep.equal(expected);
    })
  })

  describe("makeAnOrder() tests", function () {
    it('Should throw error on wrong email', () => {
      let expectedWongEmail = () => PizzaShop.makeAnOrder('pesho@abv.bg', products.pizzas[0], products.drinks[0]);
      expect(expectedWongEmail).to.throw(Error, `You must be registered to make orders!`);
    })

    it('Should throw error on wrong pizza', () => {
      PizzaShop.registerUser(validUser);
      let expectedWongPizza = () => PizzaShop.makeAnOrder(validUser, undefined, products.drinks[0]);
      expect(expectedWongPizza).to.throw(Error, "You must order at least 1 Pizza to finish the order.");
    })

    it('Should push the order to PizzaShop.orders', () => {
      PizzaShop.registerUser(validUser);
      const expectedOrder = {
        orderedPizza: products.pizzas[0],
        orderedDrink: products.drinks[0],
        email: validUser,
        status: 'pending'
      };
      let id = PizzaShop.makeAnOrder(validUser, products.pizzas[0], products.drinks[0]);
      let actualOrder = PizzaShop.orders[id];
      expect(actualOrder).to.deep.equal(expectedOrder);
    })

    it('Should return the a number', () => {
      PizzaShop.registerUser(validUser);
      let actual = PizzaShop.makeAnOrder(validUser, products.pizzas[0], products.drinks[0]);
      expect(isNaN(actual)).to.be.equal(false);
    })
  })

  describe("completeOrder() tests", function () {
    it('Should complete first order', () => {
      PizzaShop.registerUser(validUser);
      PizzaShop.makeAnOrder(validUser, products.pizzas[0], products.drinks[0])
      let actualOrder = PizzaShop.completeOrder();
      expect(actualOrder.status).to.deep.equal('completed');
    })
  })

  describe("detailsAboutMyOrder({id}) tests", function () {
    it('Should complete first order', () => {
      PizzaShop.registerUser(validUser);
      PizzaShop.makeAnOrder(validUser, products.pizzas[0], products.drinks[0])
      let actualOrder = PizzaShop.completeOrder();
      expect(actualOrder.status).to.deep.equal('completed');
    })
  })
})