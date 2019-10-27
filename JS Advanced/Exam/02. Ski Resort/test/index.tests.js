let SkiResort = require('../solution');

let assert = require('chai').assert;

describe('SkiResort tests', function () {
    describe('Constructor tests', () => {
        it('Instantiation with correct parameters', () => {
            let resort = new SkiResort('test');
            assert.deepEqual(resort, { name: 'test', voters: 0, hotels: [] })
        })
    })
    describe('bestHotel tests', () => {
        it('Response without voters', () => {
            let resort = new SkiResort('test');
            let act1 = resort.bestHotel;
            assert.equal(act1, "No votes yet");
        })
        it('Response with voters', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            resort.build('secondary name', 3);
            resort.book('Some name', 3);
            resort.book('secondary name', 3);
            resort.leave('Some name', 3, 10);
            resort.leave('secondary name', 3, 2);
            let act1 = resort.bestHotel;
            assert.equal(act1, `Best hotel is Some name with grade 30. Available beds: 3`);
        })
    })
    describe('Build  tests', () => {
        it('Building with wrong parameters should throw error', () => {
            let resort = new SkiResort('test');
            let act1 = () => resort.build('Some name', 0);
            let act2 = () => resort.build('', 3);
            assert.throws(act1, Error, "Invalid input");
            assert.throws(act2, Error, "Invalid input");
        })
        it('Building with right parameters should return successfull msg', () => {
            let resort = new SkiResort('test');
            let act3 = resort.build('Some name', 3);
            assert.equal(act3, "Successfully built new hotel - Some name");
        })
    })
    describe('Book  tests', () => {
        it('Booking with wrong parameters should throw error', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            let act1 = () => resort.book('Some name', 0);
            let act2 = () => resort.book('', 3);
            let act3 = () => resort.book('asd', 3);
            let act4 = () => resort.book('Some name', 4);
            assert.throws(act1, Error, "Invalid input");
            assert.throws(act2, Error, "Invalid input");
            assert.throws(act3, Error, "There is no such hotel");
            assert.throws(act4, Error, "There is no free space");
        })
        it('Booking with right parameters should return successfull msg', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            let act1 = resort.book('Some name', 2);
            assert.equal(act1, "Successfully booked");
        })
    })
    describe('Leave  tests', () => {
        it('With wrong parameters => Throws Error', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            resort.book('Some name', 3);
            let act1 = () => resort.leave('Some name', 0, 0);
            let act2 = () => resort.leave('', 3, 0);
            let act3 = () => resort.leave('asd', 3, 0);
            assert.throws(act1, Error, "Invalid input");
            assert.throws(act2, Error, "Invalid input");
            assert.throws(act3, Error, "There is no such hotel");
        })
        it('Leaving with right parameters should return successfull msg', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            resort.book('Some name', 3);
            let act1 = resort.leave('Some name', 3, 5);
            assert.equal(act1, "3 people left Some name hotel");
        })
    })
    describe('averageGrade  tests', () => {
        it('Response without voters', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            let act1 = resort.averageGrade();
            assert.equal(act1, "No votes yet");
        })
        it('Response with voters', () => {
            let resort = new SkiResort('test');
            resort.build('Some name', 3);
            resort.build('secondary name', 3);
            resort.book('Some name', 3);
            resort.book('secondary name', 3);
            resort.leave('Some name', 3, 10);
            resort.leave('secondary name', 3, 2);
            let act1 = resort.averageGrade();
            assert.equal(act1, `Average grade: 6.00`);
        })
    })
});
