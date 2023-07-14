export const toLinkText = (str) => {
    return str.toString().toLowerCase().split(' ').join('-');
}