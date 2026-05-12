//disini ada const operasi yang berisi objek dengan operator sebagai key dan fungsi sebagai value untuk melakukan operasi matematika sesuai dengan operator yang dipilih oleh user
const operasi = {
  "+": (a, b) => a + b,
  "-": (a, b) => a - b,
  "*": (a, b) => a * b,
  "/": (a, b) => a / b,
  "%": (a, b) => a % b,
};

// fungsi hitung yang menerima operator dan angka sebagai parameter, lalu memanggil fungsi yang sesuai dengan operator yang dipilih oleh user
const hitung = (operator, ...angka) => operasi[operator](...angka);

// fungsi printKalkulator yang akan meminta input dari user untuk angka pertama, operator, dan angka kedua, lalu memanggil fungsi hitung untuk mendapatkan hasilnya dan menampilkan hasilnya ke user
const printKalkulator = () => {
  const a = Number(prompt("Angka pertama:"));
  const operator = prompt("Operator (+ - * / %):");
  const b = Number(prompt("Angka kedua:"));

  // validasi input, jika operator tidak valid atau angka yang dimasukkan bukan angka, maka akan menampilkan alert dan keluar dari fungsi
  if (!operasi[operator] || Number.isNaN(a) || Number.isNaN(b)) {
    alert("Input tidak valid");
    return;
  }
  // memanggil fungsi hitung dengan operator dan angka yang dimasukkan oleh user, lalu menampilkan hasilnya ke user
  alert(`Hasil: ${hitung(operator, a, b)}`);
};
