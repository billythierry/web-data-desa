document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode; // kotakabupaten | kecamatan

    const labels = chartDataRaw.map(item =>
        mode === "kotakabupaten"
            ? item.kota_kabupaten
            : item.kecamatan
    );

    const values = chartDataRaw.map(item =>
        Number(item.jumlah_domain_konflik)
    );

    // hanya dipakai saat mode kotakabupaten
    const provinsiList = chartDataRaw.map(item =>
        item.provinsi ?? null
    );

    new Chart(document.getElementById('chartKotaKabupaten'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label:
                    mode === "kotakabupaten"
                        ? 'Top 10 Kota/Kabupaten dengan Jumlah Domain Konflik Terbanyak'
                        : 'Kecamatan: Jumlah Domain Konflik',
                data: values,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        title: function (context) {
                            const index = context[0].dataIndex;

                            if (mode === "kotakabupaten") {
                                return `${labels[index]} (${provinsiList[index]})`;
                            }

                            return labels[index];
                        },
                        label: function (context) {
                            return `Jumlah Domain Konflik: ${context.raw}`;
                        }
                    }
                }
            }
        }
    });
});
