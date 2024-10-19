async function generatePDF() {
    try {
        const response = await fetch(`get_data.php`);
        
        if (!response.ok) {
            const text = await response.text();
            console.error("Error en la respuesta:", text);
            alert("Error al obtener datos. Verifica la consola.");
            return;
        }

        const data = await response.json();

        if (data.error) {
            alert(data.error);
            return;
        }
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const imgData = await fetch('img/car.png').then(res => res.blob()).then(blob => {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.onloadend = () => resolve(reader.result);
                reader.readAsDataURL(blob);
            });
        });

       
        const imgWidth = 10; 
        const imgHeight = 10; 
        doc.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
        doc.setFontSize(18);
        doc.text('Solicitud de Reserva de Vehículos', 105, 20, null, null, 'center');
        doc.setLineWidth(1);
        doc.line(10, 25, 200, 25); 
        doc.setFontSize(12);
        doc.text(`NIT: ${data.NIT}`, 10, 35);
        doc.text(`Nombre: ${data.NOMBRE}`, 10, 45);
        doc.text(`DPI: ${data.DPI}`, 10, 55);
        doc.text(`Correo: ${data.correo}`, 10, 65);
        doc.text(`Teléfono: ${data.telefono}`, 10, 75);
        doc.text(`Dirección: ${data.direccion}`, 10, 85);

        doc.text(`Fecha de Emisión: ${data.fechasol}`, 10, 95);
        doc.text(`Fecha de Entrega: ${data.fechaent}`, 10, 105);
        doc.text(`Estado: ${data.estatus}`, 10, 115);
        doc.setFontSize(10);
        doc.text('Gracias por elegir nuestro servicio', 105, 140, null, null, 'center');
        doc.save('solicitud.pdf');
    } catch (error) {
        console.error("Error al generar el PDF:", error);
    }
}
