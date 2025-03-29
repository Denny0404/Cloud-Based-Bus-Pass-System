class Data {
    constructor(type = 'text', length = 5) {
        if (type === 'text') {
            this.length = length;
            this.chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        } else if (type === 'number') {
            this.length = length;
            this.chars = '0123456789';
        }
    }

    generate() {
        return Array.from({ length: this.length }, () =>
            this.chars[Math.floor(Math.random() * this.chars.length)]
        ).join('');
    }

    generatePhoneNumber() {
        return Math.floor(1000000000 + Math.random() * 9000000000).toString();
    }
}

module.exports = Data;