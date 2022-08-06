let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven() {
    // if(numbers%2 === 0){
    // }
    for (let i = 0; i < numbers.length; i++) {
        if(numbers[i]%2 === 0){
            console.log(numbers[i]+"は偶数です");
        }
    }
    return;
}
isEven();


class Car {
    constructor(gas, num) {
        this.gas = gas;
        this.num = num;
    }
    getNumGas() {
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.num}です`);
    }
}

let c = new Car('燃料', 1234);
c.getNumGas();



