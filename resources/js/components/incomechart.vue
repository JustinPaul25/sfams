<template>
    <canvas id="myChart" width="400" height="400"></canvas>
</template>

<script>
    import Chart from 'chart.js/auto';
    import regression from 'regression'

    export default {
        data() {
            return {
                rawData: []
            }
        },
        methods: {
            setTheoryData() {
                var theoryData = [];
                for (var i = 0; i < this.rawData.length; i++) {
                    const toPush = [this.rawData[i][0], this.formula(this.result.equation, this.rawData[i][0])];
                    theoryData.push({
                        x: toPush[0],
                        y: toPush[1]
                    })
                }   

                return theoryData;
            },
            formula(coeff, x) {
                var result = null;
                for (var i = 0, j = coeff.length - 1; i < coeff.length; i++, j--) {
                    result += coeff[i] * Math.pow(x, j);
                }
                return result;
            },
            convertRawData() {
                let dataArr = [];
                this.rawData.forEach(element => {
                    const toPush = {
                        x: element[0],
                        y: element[1]
                    }
                    dataArr.push(toPush)
                });

                return dataArr
            },
            async getDatas() {
                axios.get('/enroll-data')
                .then(response => {
                    response.data.enroll.forEach((val, key, arr) => {
                        this.rawData.push([val.students, parseInt(val.school_year.from)])
                        if (Object.is(arr.length - 1, key)) {
                            this.rawData.push([(parseFloat(val.students) * parseFloat(response.data.rate)) +  parseFloat(val.students), parseInt(val.school_year.to)])
                        }
                    });
                    return
                })
            },
            constructDatas() {
                const ctx = document.getElementById('myChart');

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                            type: 'line',
                            label: 'Sample Data',
                            data: this.convertRawData(),
                            backgroundColor: '#23408E'
                        }],
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom',
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            }
        },
        async mounted() {
            await this.getDatas()
            this.constructDatas();
        }
    }
</script>