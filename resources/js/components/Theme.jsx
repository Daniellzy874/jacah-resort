import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';



const Theme = () => {

    function Display() {
        const theme = localStorage.getItem('selected-theme');
        if (theme === 'dark') {
            document.getElementById('clipImage1').style.display = 'none';
            document.getElementById('clipImage2').style.display = 'block';
        }
        if (theme === 'light') {
            document.getElementById('clipImage1').style.display = 'block';
            document.getElementById('clipImage2').style.display = 'none';
        }
    } setInterval(Display, 1000);


    return (

        <div style={{ height: '100%', width: '150vh' }}>

            <iframe className="clipHover clipImage_light" id="clipImage1" src="https://app.lapentor.com/sphere/jacah-tour" frameborder="0" width="100%" height="100%" Scrolling="no"
                allow="vr,gyroscope,accelerometer" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                oallowfullscreen="true" msallowfullscreen="true"></iframe>

            <iframe src="https://app.lapentor.com/sphere/jacah-tour-night" className="clipHover clipImage_night" id="clipImage2" frameborder="0" width="100%" height="100%" Scrolling="no"
                allow="vr,gyroscope,accelerometer" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true" msallowfullscreen="true"></iframe>
        </div>
    )
}

const root = ReactDOM.createRoot(document.getElementById('theme'));
root.render(<Theme />);

export default Theme
