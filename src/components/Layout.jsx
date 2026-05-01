import { Link, useLocation } from "react-router-dom";
import { useEffect, useMemo, useState } from "react";

export default function Layout({ children }) {
  const location = useLocation();
  const [showBackToTop, setShowBackToTop] = useState(false);
  const headerClass = useMemo(() => {
    if (location.pathname.startsWith("/characters/new")) return "background4";
    if (location.pathname.includes("/edit")) return "background5";
    if (/^\/characters\/[^/]+$/.test(location.pathname)) return "background3";
    if (location.pathname.startsWith("/characters")) return "character-background";
    return "";
  }, [location.pathname]);

  useEffect(() => {
    const onScroll = () => setShowBackToTop(window.scrollY > 200);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <>
      <header className={headerClass}>
        <div className="background">
          <nav className="navbar">
            <div className="container">
              <Link className="navbar-logo" to="/">
                <em>ぼっち・ざ・ろっく!</em>
              </Link>
              <div className="navbar-nav">
                <Link to="/">Home</Link>
                <a href="/#design">Arts</a>
                <a href="/#blog">News</a>
                <a href="/#about">About</a>
                <div className="dropdown">
                  <Link className="dropbtn" to="/characters">
                    Characters
                  </Link>
                  <div className="dropdown-content">
                    <Link to="/characters">Characters List</Link>
                    <Link to="/characters/new">Add Character</Link>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>

        <div className="banner">
          <div className="container">
            <h1 className="banner-title">
              <span style={{ color: "#EEB8C4" }}>Bocchi</span>{" "}
              <span style={{ color: "#E6D47B" }}>the</span>{" "}
              <span style={{ color: "#4061A0" }}>Rock</span>{" "}
              <span style={{ color: "#D0574E" }}>!</span>
            </h1>
          </div>
        </div>
      </header>

      <main>
        {children}
      </main>

      <footer>
        <div className="social-links">
          <a href="https://www.facebook.com/BocchiTheRock.AnimeSaiko/" target="_blank" rel="noreferrer">
            <img src="/images/fb.svg" alt="Facebook" className="social-icon" />
          </a>
          <a href="https://x.com/btr_anime" target="_blank" rel="noreferrer">
            <img src="/images/twitter.svg" alt="Twitter" className="social-icon" />
          </a>
          <a href="https://www.instagram.com/btr_anime/?hl=en" target="_blank" rel="noreferrer">
            <img src="/images/ig.svg" alt="Instagram" className="social-icon" />
          </a>
          <a href="https://www.youtube.com/watch?v=e876f6PKblo" target="_blank" rel="noreferrer">
            <img src="/images/yt.svg" alt="YouTube" className="social-icon" />
          </a>
        </div>
        <p>Andrey & Aeron, 2022 Bocchi the Rock!, All Rights Reserved.</p>
      </footer>

      <div
        className="back-to-top"
        id="backToTop"
        onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
        style={{ display: showBackToTop ? "block" : "none" }}
      >
        Back to Top
      </div>
    </>
  );
}
