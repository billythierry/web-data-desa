document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    // Ambil data dari atribut data-*
    const provinsi = JSON.parse(el.dataset.provinsi);
    const kabupaten = JSON.parse(el.dataset.kabupaten);
    const kecamatan = JSON.parse(el.dataset.kecamatan);

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

    // --- Chart Kecamatan ---
    const kecamatanData = kecamatan.map(item => ({
        label: item.kecamatan,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: kecamatanData.map(kc => kc.label),
            datasets: [{
                label: 'Jumlah 15 Terbanyak Domain Konflik per Kecamatan',
                data: kecamatanData.map(kc => kc.value),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }]
        }
    });
});
