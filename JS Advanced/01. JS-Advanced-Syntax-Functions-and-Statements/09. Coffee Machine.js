function solve(input) {
    /* 
        We assume that we have resource containing the prices 
    */
    let income = 0.0;
    let price_table = {
        'coffee': {
            'caffeine': 0.80,
            'decaf': 0.90
        },
        'tea': 0.80
    };
    function calcPrice(order) {
        let price = 0;
        let credits = Number(order.shift()); // inserted coins
        let type = order.shift();
        if (type == 'coffee') {// coffee
            let subtype = order.shift();
            price += subtype == 'caffeine' ? 0.80 : 0.90;
        }
        else
            price += 0.80;
        price += order.includes('milk') ? Math.round((price * 0.1) * 10) / 10 : 0; // milk
        price += order.pop() > 0 ? 0.1 : 0; // sugar
        let msg = '';
        if (credits >= price) {
            let change = Math.round((credits - price) * 100) / 100;
            msg =`You ordered ${type}. Price: $${price.toFixed(2)} Change: $${change.toFixed(2)}`;
            income += price;
        } else {
            let need = Math.round((price - credits) * 100) / 100;
            msg = `Not enough money for ${type}. Need $${need.toFixed(2)} more.`;
        }
        console.log(msg);
    };
    input
        .map(x => x.split(', '))
        .map((x) => calcPrice(x))
    console.log(`Income Report: $${income.toFixed(2)}`)
}

solve([
    '1.00, coffee, caffeine, milk, 4',
    '0.40, tea, milk, 2',
    '1.00, coffee, decaf, 0'
]);