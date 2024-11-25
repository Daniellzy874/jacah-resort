import React from 'react';
import { useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';

function RoomList() {
    return (
        <div>
            <div className='w-full h-50 bg-green-500 mt-2 rounded-md flex'>
                <div className='w-50 h-full bg-blue-700'>

                </div>
                <div className='w-50 h-full bg-red-500'>

                </div>
            </div>


        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById('roomlist'));
root.render(<RoomList />);
export default RoomList
