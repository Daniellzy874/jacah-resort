import React from 'react'
import { useEffect, useRef, useState } from "react";
import 'react-slideshow-image/dist/styles.css';
import { Fade, Zoom, Slide } from 'react-slideshow-image'


function Carousel({ item }) {
    const [Item] = useState([item]);
    const [acts, setActs] = useState([]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/category_image");
            const resdata = await reqdata.json();
            // console.log(resdata);
            setActs(resdata)
        }
        getUserdata();
    }, []);

    return (
        <div className="slide-container">
            <Slide
                autoplay={false}
            >
                {Item.map((slideImage, index) => (
                    <div key={index}>
                        <img src={`${slideImage.image}`} alt="" style={{ height: "180px", width: "400px" }} />

                    </div>
                ))}

            </Slide>
        </div >
    )
}

export default Carousel
