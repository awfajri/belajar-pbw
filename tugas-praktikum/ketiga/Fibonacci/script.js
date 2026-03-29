let x = 0; // Dua suku pertama dalam deret Fibonacci adalah 0 dan 1
let y = 1;
let res; // ini adlh variabel untuk menyimpan hasil penjumlahan dua suku sebelumnya

// ini adalah fungsi untuk mencetak deret Fibonacci hingga suku ke n
function printFibo() {
  let n = prompt("Silakan input n: "); // disini proghram meminta input dari user berupa jumlah suku yg ingin di cetak dalam deret Fibonacci
  let i = 1; // Variabel untuk menghitung jumlah suku yang sudah dicetak

  while (i <= n) {
    // Loop akan berjalan hingga jumlah suku yang dicetak mencapai n
    console.log(x); // Mencetak suku Fibonacci saat ini (x)
    res = x + y; // Menghitung suku berikutnya dengan menjumlahkan dua suku sebelumnya (x dan y)
    x = y; // Memperbarui nilai x menjadi y (suku sebelumnya)
    y = res; // Memperbarui nilai y menjadi hasil penjumlahan (suku berikutnya)
    i++; // Increment untuk menghitung jumlah suku yang sudah dicetak
  }
}
