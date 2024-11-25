import React from 'react'
import { useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';
import { createPortal } from 'react-dom';
import { Pannellum } from 'pannellum-react';
import Scene from '../VirtualTour';




function GalleryModal() {



    const [scene, setScene] = useState(Scene.insideOne);
    const hotSpots = (Element, i) => {
        if (Element.cssClass === 'hotSpotElement') return (
            <Pannellum.hotSpots key={i} type={Element.type} cssClass={Element.cssClass} yaw={Element.yaw} handleClick={() => alert('click')}></Pannellum.hotSpots>
        )
        else if (Element.cssClass === 'moveScene') return (
            <Pannellum.hotSpots key={i} type={Element.type} yaw={Element.yaw} cssClass={Element.cssClass} handleClick={() => setScene(Scene[Element.scene])}></Pannellum.hotSpots>

        )


    }

    const [records, setRecords] = useState([]);
    const [image, setImage] = useState([{
        id: '',
        image: '',
        name: '',
        type: ''

    }]);
    useEffect(() => {
        const getUserdata = async () => {
            const reqdata = await fetch("http://127.0.0.1:8000/json_panorama");
            const resdata = await reqdata.json();
            // console.log(resdata);
            setImage(resdata)
            setRecords(resdata)
        }
        getUserdata();
    }, []);

    const Filter = (event) => {
        if (event.target.value === "All Photos") {
            setRecords(image);
        }
        else {
            setRecords(image.filter(f => f.type.includes(event.target.value)))
            // console.log(categoryData.filter(f => f.category.includes(event.target.value)));
        }
    }





    return (
        <div className='menu__content' style={{ display: "block", borderRadius: "0" }}>
            {createPortal(
                <div style={{ marginLeft: "5px", height: "100%", width: "100%", gap: "5px", display: "flex" }}>
                    <input type="text" value={'All Photos'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"

                        }} readOnly />
                    <input type="text" value={'Room'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />
                    <input type="text" value={'Cottage'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />
                    <input type="text" value={'Pool'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />
                    <input type="text" value={'Amenities'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />

                    <input type="text" value={'Bathroom'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />
                    <input type="text" value={'Dining'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />
                    <input type="text" value={'Kitchen'}
                        onClick={Filter}
                        style={{
                            border: "none",
                            width: "10%",
                            height: "70%",
                            backgroundColor: "#47c559",
                            textAlign: "center",
                            borderRadius: "50px",
                            cursor: "pointer",
                            color: "white",
                            padding: "10px"
                        }} readOnly />

                </div>,
                document.getElementById("gal-btn")
            )}
            {/* {createPortal(
                <div>
                    <Pannellum

                        mouseZoom={false}
                        autoLoad
                        image={`./assets/image/panorama/${pic[0].image}`}

                    />
                </div>,
                document.getElementById('pic')
            )} */}

            {records.map((img, gallery) =>
                <div key={gallery} style={{ height: "100%", width: "48%", margin: "6px", display: "inline-block" }}>
                    <Pannellum
                        key={gallery}
                        mouseZoom={false}
                        autoLoad
                        image={`./assets/image/panorama/${img.image}`}


                    />
                    <div style={{ height: "10%", width: "100%" }}>
                        <h1 className='nav__link' style={{ fontSize: "20px" }}>{img.name}</h1>
                    </div>

                </div>
            )}

            {/* {createPortal(

                <div style={{ display: "flex", alignItems: "center", height: "100%" }}>
                    <Pannellum
                        height="100%"
                        mouseZoom={false}
                        autoLoad
                        yaw={scene.yaw}
                        image={scene.image}
                        autoRotate
                    >
                        {Object.values(scene.hotSpots).map((Element, i) =>
                            hotSpots(Element, i)
                        )}

                    </Pannellum>
                </div>,
                document.getElementById('clipImage1')


            )} */}



        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('gallery-modal'));
root.render(<GalleryModal />);

export default GalleryModal
