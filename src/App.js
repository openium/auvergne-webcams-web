import React, { Component } from 'react';
import logo from './logo.svg';
import playStoreBadge from './play-store-badge.svg'
import appStoreBadge from './app-store-badge.svg'
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Auvergne Webcams</h1>
        </header>
        <div>
          <p className="App-intro">
            Auvergne webcams est disponible au téléchargement sur <b>iOS</b> et <b>Android</b> !
          </p>
          <a style={{marginRight: '10px'}} href='https://itunes.apple.com/app/id1183930829'>
            <img height="75px" alt="Disponible sur Google Play" src={appStoreBadge}/>
          </a>
          <a style={{marginLeft: '10px'}} href='https://play.google.com/store/apps/details?id=fr.openium.auvergnewebcams&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'>
            <img height="75px" alt="Disponible sur l'App Store" src={playStoreBadge}/>
          </a>
        </div>
      </div>
    );
  }
}

export default App;
