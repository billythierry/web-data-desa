document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode; 

    // Tentukan label berdasarkan mode
    const chartData = chartDataRaw.map(item => ({
        label: mode === "kotakabupaten" ? item.kota_kabupaten : item.kecamatan,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartKotaKabupaten'), {
        type: 'bar',
        data: {
            labels: chartData.map(p => p.label),
            datasets: [{
                label: mode === "kotakabupaten"
                    ? 'Top 10 Kota/Kabupaten dengan Jumlah Domain Konflik Terbanyak'
                    : `Kecamatan: Jumlah Domain Konflik`,
                data: chartData.map(p => p.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        }
    });
});
