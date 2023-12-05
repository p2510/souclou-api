let formatNumber = (number) => {
    return number < 10 ? `0${number}` : number;
};

const obtainMention = (number) => {
    if (number < 4) {
        return "Très mal";
    } else if (number < 8) {
        return "Mal";
    } else if (number < 10) {
        return "Insuffisant";
    } else if (number < 12) {
        return "Passable";
    } else if (number < 14) {
        return "Assez bien";
    } else if (number < 16) {
        return "Bien";
    } else if (number < 18) {
        return "Très bien";
    } else {
        return "Excellent";
    }
};

export { formatNumber , obtainMention };
