document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    // Ambil data dari atribut data-*
    const provinsi = JSON.parse(el.dataset.provinsi);

    // --- Chart Provinsi ---
   const provinsiData = provinsi.map(item => ({
        label: item.provinsi,
        value: Number(item.jumlah_domain_konflik)
   }));

   new Chart(document.getElementById('chartProvinsi'),{
        type: 'bar',
        data: {
            labels: provinsiData.map(p => p.label),
            datasets: [{
                label: 'Jumlah 10 Terbanyak Domain Konflik per Provinsi',
                data: provinsiData.map(p => p.value),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }]
        }
   });

});
