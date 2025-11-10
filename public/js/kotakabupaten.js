document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    // Ambil data dari atribut data-*
    const kabupaten = JSON.parse(el.dataset.kabupaten);

   // --- Chart Kabupaten ---
    const kabupatenData = kabupaten.map(item => ({
        label: item.kota_kabupaten,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartKabupaten'), {
        type: 'bar',
        data: {
            labels: kabupatenData.map(k => k.label), 
            datasets: [{
                label: 'Jumlah Domain Konflik per Kota/Kabupaten',
                data: kabupatenData.map(k => k.value), 
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }]
        }
    })

});
