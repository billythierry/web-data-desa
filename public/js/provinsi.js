document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode; // provinsi | kabupaten

    const labels = chartDataRaw.map(item =>
        mode === "provinsi"
            ? item.provinsi
            : item.kota_kabupaten
    );

    const values = chartDataRaw.map(item =>
        Number(item.jumlah_domain_konflik)
    );

    const provinsiList = chartDataRaw.map(item =>
        item.provinsi ?? null
    );

    new Chart(document.getElementById('chartProvinsi'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Domain Konflik',
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
                            const kabupaten = labels[index];
                            const provinsi = provinsiList[index];

                            if (mode === "kabupaten" && provinsi) {
                                return `${kabupaten} (${provinsi})`;
                            }

                            return kabupaten;
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
