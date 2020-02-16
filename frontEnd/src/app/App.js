import React from 'react'
import List from './Component/List'
import '../style/stylePostow.css'
import dane from './Dane/postyDane.json'  


const App = () =>{
    return(
        <section>
            <ul>{dane.map(e => {
                return <List {...e}/>
            })}</ul>
        </section>
    )
}

export default App