const arts = [
  { title: "Ikuyo Kita and Hitori Gotoh", image: "bocchiart1.jpg", type: "Fan Art", likes: 67 },
  { title: "Middle School Hitori Gotoh", image: "bocchiart2.jpg", type: "Official Art", likes: 99 },
  { title: "PA-san", image: "bocchiart3.jpg", type: "Official Art", likes: 82 },
  { title: "Hiroi Kikuri", image: "bocchiart5.jpg", type: "Fan Art", likes: 76 },
  { title: "Ijichi Seika and Ijichi Nijika", image: "bocchiart7.jpg", type: "Fan Art", likes: 52 },
  { title: "Yamada Ryo", image: "bocchiart6.jpg", type: "Fan Art", likes: 89 },
];

const news = [
  {
    title: "Bocchi the Rock! Staff Reflect on Growth and Change",
    date: "July 12, 2024",
    image: "bocchinews1.jpg",
    link: "https://www.animenewsnetwork.com/interview/2024-07-12/bocchi-the-rock-staff-reflect-on-growth-and-change/.213092",
    text: "The anime adaptation of Aki Hamaji's four-panel manga was a sleeper hit in late 2022. Viewers related to Bocchi's awkwardness and social anxiety, while entertained by the off-the-cuff animation and Kessoku Band's breakout music success.",
  },
  {
    title: "Bocchi the Rock Movie Teaser Trailer, Poster Released",
    date: "October 16, 2023",
    image: "bocchinews2.jpg",
    link: "https://screenrant.com/bocchi-the-rock-movies-release-date-new-trailer/",
    text: "Bocchi the Rock is making a comeback with a new movie release. Fans got a new teaser trailer and poster, highlighting memorable moments from the original TV anime run.",
  },
  {
    title: "Bocchi the Rock Crew Never Saw Its Memes Coming",
    date: "August 1, 2024",
    image: "bocchinews3.jpg",
    link: "https://comicbook.com/anime/news/bocchi-the-rock-crew-meme-interview/",
    text: "At Anime Expo, creators discussed how the series' meme culture unexpectedly expanded worldwide while the franchise continued to grow through compilation film releases.",
  },
];

export default function HomePage() {
  return (
    <>
      <section className="design" id="design">
        <div className="container">
          <div className="title">
            <h2>Official and Fan Arts</h2>
            <p>Recent arts from different platforms</p>
          </div>

          <div className="design-content">
            {arts.map((art) => (
              <div className="design-item" key={art.title}>
                <div className="design-img">
                  <img id="art" src={`/images/${art.image}`} alt={art.title} loading="lazy" decoding="async" />
                  <span>{art.likes}</span>
                  <span>{art.type}</span>
                </div>
                <div className="design-title">
                  <a href="#design">{art.title}</a>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="showcase" id="showc">
        <div className="container_img">
          <div className="insta-content">
            <div className="showc_font">
              <h2>Photoshoot</h2>
            </div>

            <div className="insta-grid grid">
              <div>
                <img src="/images/ryoofficial1.jpg" alt="Ryo Official" loading="lazy" decoding="async" />
              </div>
              <div>
                <img src="/images/kitaofficial1.jpg" alt="Kita Official" loading="lazy" decoding="async" />
              </div>
              <div>
                <img src="/images/nijikaofficial1.jpg" alt="Nijika Official" loading="lazy" decoding="async" />
              </div>
              <div>
                <img src="/images/hitoriofficial1.jpg" alt="Hitori Official" loading="lazy" decoding="async" />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="blog" id="blog">
        <div className="container">
          <div className="title">
            <h2>Recent News</h2>
            <p>News about Bocchi the Rock! Worldwide</p>
          </div>

          <div className="blog-content">
            {news.map((item) => (
              <div className="blog-item" key={item.title}>
                <div className="blog-img">
                  <img id="news" src={`/images/${item.image}`} alt={item.title} loading="lazy" decoding="async" />
                  <span>❤</span>
                </div>

                <div className="blog-text">
                  <span>{item.date}</span>
                  <h2>{item.title}</h2>
                  <p>{item.text}</p>
                  <a href={item.link} target="_blank" rel="noreferrer">
                    Read More
                  </a>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="about" id="about">
        <div className="container">
          <div className="about-content">
            <div id="about-img-div">
              <img id="about-img" src="/images/bocchiphoto1.jpg" alt="kessoku" loading="lazy" decoding="async" />
            </div>
            <div className="about-text">
              <div className="title">
                <h2>Bocchi the Rock!</h2>
                <h3>ぼっち・ざ・ろっく!</h3>
                <p>Manga/Anime TV Series</p>
              </div>
              <p style={{ textAlign: "justify" }}>
                Bocchi the Rock! (ぼっち・ざ・ろっく！, Botchi Za Rokku!) is a Japanese four-panel manga series written and
                illustrated by Aki Hamaji. It has been serialized in Houbunsha&apos;s seinen manga magazine Manga Time Kirara
                Max since December 2017.
              </p>

              <p style={{ textAlign: "justify" }}>
                An anime television series adaptation produced by CloverWorks aired from October to December 2022. Both
                the manga and the anime received widespread acclaim for the animation, writing, voice acting, comedy,
                characters, music, and exploration of social anxiety.
              </p>

              <p style={{ textAlign: "justify" }}>
                Extremely anxious and socially awkward Hitori Gotoh longs to become a rock musician in spite of her
                struggles, while fulfilling her desires to one day make friends.
              </p>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
