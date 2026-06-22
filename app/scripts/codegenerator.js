function makeCode() {
    let x = Math.floor(Math.random() * 6) + 4;
    let y = Math.floor(Math.random() * 6) + 5;
    let z = Math.floor(Math.random() * 6) + 5;

    x = y * z * x;

    x = y * z * x;
    x = y * z * x;


    return x;
}