import React from 'react'
import List from './Component/List'
// import '../style/stylePostow.css'
import './stylePostow.modules.scss'
import dane from './Dane/postyDane.json'  


class App extends React.Component{
    render(){
        return(
            <section>
                <ul>{dane.map(e => {
                    return <List {...e} key={e.title} />
                })}</ul>
            </section>
        )
    }
}

export default App